const fs = require('fs');
const xml2js = require('xml2js');

// Function to update the database
async function dbUpdate(database, blogPost) {
    const collection = database.collection('cars_blogs');

    // Check if the blog post with the given uid exists
    const existingPost = await collection.findOne({ uid: blogPost.uid });

    if (existingPost) {
        // Check if any fields are different
        const fieldsToUpdate = {};
        for (const key in blogPost) {
            if (blogPost[key] !== existingPost[key]) {
                fieldsToUpdate[key] = blogPost[key];
            }
        }

        // If there are fields to update, update the document
        if (Object.keys(fieldsToUpdate).length > 0) {
            await collection.updateOne(
                { uid: blogPost.uid },
                { $set: fieldsToUpdate }
            );
            console.log(`BlogPost with uid ${blogPost.uid} updated.`);
        } else {
            console.log(`BlogPost with uid ${blogPost.uid} is already up-to-date.`);
        }
    } else {
        // Insert the new blog post
        await collection.insertOne(blogPost);
        console.log(`BlogPost with uid ${blogPost.uid} inserted.`);
    }
}

// Function to parse the XML file and update the database
async function parseAndUpdate(database) {
    const parser = new xml2js.Parser();

    fs.readFile('data.xml', (err, data) => {
        if (err) {
            console.error('Error reading XML file:', err);
            return;
        }

        parser.parseString(data, async (err, result) => {
            if (err) {
                console.error('Error parsing XML file:', err);
                return;
            }

            const blogPosts = result.BlogPosts.BlogPost;
            for (const blogPost of blogPosts) {
                // Convert blogPost object to a simpler format
                const formattedBlogPost = {
                    uid: blogPost.uid[0],
                    hsn: blogPost.hsn[0],
                    tsn: blogPost.tsn[0],
                    make: blogPost.make[0],
                    model: blogPost.model[0],
                    year: blogPost.year[0],
                    category: blogPost.category[0],
                    engine: blogPost.engine[0],
                    fuelType: blogPost.fuelType[0],
                    image_1: blogPost.image_1[0],
                    image_2: blogPost.image_2[0],
                    image_3: blogPost.image_3[0],
                    image_4: blogPost.image_4[0],
                    createdAt: blogPost.createdAt[0],
                    author: blogPost.author[0],
                    hubraum: blogPost.hubraum[0],
                    co2Wert: blogPost.co2Wert[0],
                    antriebsart: blogPost.antriebsart[0],
                    backVolumen: blogPost.backVolumen[0],
                    maxSpeed: blogPost.maxSpeed[0]
                };

                await dbUpdate(database, formattedBlogPost);
            }
        });
    });
}

module.exports = parseAndUpdate;