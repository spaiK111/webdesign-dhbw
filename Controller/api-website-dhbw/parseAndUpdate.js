const fs = require('fs');
const xml2js = require('xml2js');

// Function to update the database
async function dbUpdate(database, formattedEntry) {
    const collection = database.collection('cars_blogs');

    // Check if the blog post with the given uid exists
    const existingPost = await collection.findOne({ uid: formattedEntry.uid });

    if (existingPost) {
        // Check if any fields are different
        const fieldsToUpdate = {};
        for (const key in formattedEntry) {
            if (formattedEntry[key] !== existingPost[key]) {
                fieldsToUpdate[key] = formattedEntry[key];
            }
        }

        // If there are fields to update, update the document
        if (Object.keys(fieldsToUpdate).length > 0) {
            await collection.updateOne(
                { uid: formattedEntry.uid },
                { $set: fieldsToUpdate }
            );
            console.log(`FormattedEntry with uid ${formattedEntry.uid} updated.`);
        } else {
            console.log(`FormattedEntry with uid ${formattedEntry.uid} is already up-to-date.`);
        }
    } else {
        // Insert the new blog post
        await collection.insertOne(formattedEntry);
        console.log(`FormattedEntry with uid ${formattedEntry.uid} inserted.`);
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

            const entries = result.root.Entry;
            for (const entry of entries) {
                // Convert blogPost object to a simpler format
                const formattedEntry = {
                    uid: entry.uid[0],
                    hsn: entry.hsn[0],
                    tsn: entry.tsn[0],
                    make: entry.make[0],
                    model: entry.model[0],
                    year: entry.year[0],
                    category: entry.category[0],
                    engine: entry.engine[0],
                    fuelType: entry.fuelType[0],
                    image_1: entry.image_1[0],
                    image_2: entry.image_2[0],
                    image_3: entry.image_3[0],
                    image_4: entry.image_4[0],
                    createdAt: entry.createdAt[0],
                    author: entry.author[0],
                    hubraum: entry.hubraum[0],
                    co2Wert: entry.co2Wert[0],
                    antriebsart: entry.antriebsart[0],
                    backVolumen: entry.backVolumen[0],
                    maxSpeed: entry.maxSpeed[0]
                };

                await dbUpdate(database, formattedEntry);
            }
        });
    });
}

module.exports = parseAndUpdate;