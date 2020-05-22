const fs = require("fs");
const tesseract = require("node-tesseract-ocr");
const okrabyte = require("okrabyte");
const delay = require('delay');

// Biblioteca https://www.npmjs.com/package/node-tesseract-ocr
(async () => {

    async function words() {
        const files = await new Promise((resolve, reject) => {
            fs.readdir('imgs/', (err, files) => {
                if (err) {
                    reject(err);
                } else {
                    resolve(files);
                }
            })
        });

        const filtered = files.filter(file => file !== "Icon_");


        // const mapped = await Promise.all(filtered.map((file) => {
        //     return new Promise((resolve, reject) => {
        //         okrabyte.decodeBuffer(fs.readFileSync("imgs/" + file), (err, data) => {
        //             if (err) {
        //                 return reject(err);
        //             } else {
        //                 resolve(data);
        //             }
        //         })
        //     })
        // }))

        // const config = {
        //     lang: "eng",
        //     oem: 1,
        //     psm: 3,
        // }
        // let mapped;

        // tesseract.recognize("imgs/" + filtered[2], config)
        //     .then(text => {
        //         console.log("Result:", text)
        //         mapped = text;
        //     })
        //     .catch(error => {
        //         console.log(error.message)
        //     })
        console.log(filtered);
        const result = await tesseract.recognize("imgs/" + filtered[3], {
            load_system_dawg: 0,
            tessedit_char_whitelist: "0123456789",
            presets: ["txt"],
        })

        return result;
    }

    const teste = await words();
    if (teste != undefined) {
        console.log(teste);
    }

})()