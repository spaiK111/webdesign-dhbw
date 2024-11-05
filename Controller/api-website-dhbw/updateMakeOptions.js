const updateMakeOptions = async (database) => {
    const blogCollection = database.collection('cars_blogs');
    const makeOptionsCollection = database.collection('make_options');

    try {
        // Fetch all blog posts
        const blogPosts = await blogCollection.find({}).toArray();

        // Create a map to store makes and their models
        const makeModelMap = new Map();

        blogPosts.forEach(post => {
            const make = post.make;
            const model = post.model;

            if (make && model) {
                if (!makeModelMap.has(make)) {
                    makeModelMap.set(make, new Set());
                }
                makeModelMap.get(make).add(model);
            }
        });

        // Insert or update make_options collection
        for (const [make, models] of makeModelMap.entries()) {
            const options = Array.from(models);
            await makeOptionsCollection.updateOne(
                { make: make },
                { $set: { options: options } },
                { upsert: true }
            );
        }

        console.log('Make options updated successfully');
    } catch (err) {
        console.error('Error updating make options:', err);
    }
};

module.exports = updateMakeOptions;