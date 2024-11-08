const fs = require('fs');
const xml2js = require('xml2js');


async function dbUpdate(database, formattedEntry) {
    const collection = database.collection('cars');

    const existingPost = await collection.findOne({ uid: formattedEntry.uid });

    if (existingPost) {
        
        const fieldsToUpdate = {};
        for (const key in formattedEntry) {
            if (formattedEntry[key] !== existingPost[key]) {
                fieldsToUpdate[key] = formattedEntry[key];
            }
        }

       
        if (Object.keys(fieldsToUpdate).length > 0) {
            await collection.updateOne(
                { uid: formattedEntry.uid },
                { $set: fieldsToUpdate }
            );
            console.log(`Eintrag mit uid ${formattedEntry.uid} aktualisiert.`);
        } else {
            console.log(`Eintrag mit uid ${formattedEntry.uid} ist bereits aktualisiert.`);
        }
    } else {
        
        await collection.insertOne(formattedEntry);
        console.log(`Eintrag mit uid ${formattedEntry.uid} neu hinzugefügt.`);
    }
}


async function parseAndUpdate(database) {
    const parser = new xml2js.Parser();

    fs.readFile('data.xml', (err, data) => {
        if (err) {
            console.error('Fehler beim XML file:', err);
            return;
        }

        parser.parseString(data, async (err, result) => {
            if (err) {
                console.error('Error beim XML file parsen:', err);
                return;
            }

            const entries = result.root.Entry;
            for (const entry of entries) {
                
                const formattedEntry = {
                    uid: entry.uid[0],
                    hsn: entry.hsn[0],
                    tsn: entry.tsn[0],
                    make: entry.make[0],
                    kw: parseInt(entry.kw[0]),
                    model: entry.model[0],
                    year: parseInt(entry.year[0]),
                    category: entry.category[0],
                    engine: entry.engine[0],
                    fuelType: entry.fuelType[0],
                    image_1: entry.image_1[0],
                    image_2: entry.image_2[0],
                    image_3: entry.image_3[0],
                    image_4: entry.image_4[0],
                    createdAt: entry.createdAt[0],
                    author: entry.author[0],
                    hubraum: parseInt(entry.hubraum[0]),
                    co2Wert: parseInt(entry.co2Wert[0]),
                    antriebsart: entry.antriebsart[0],
                    backVolumen: parseInt(entry.backVolumen[0]),
                    maxSpeed: parseInt(entry.maxSpeed[0])
                };

                await dbUpdate(database, formattedEntry);
            }
        });
    });
}

module.exports = parseAndUpdate;