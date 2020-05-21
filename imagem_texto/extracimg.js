const fs = require("fs");

const okrabyte = require("okrabyte");
const tesseract = require("node-tesseract-ocr");
 
const config = {
  lang: "eng",
  oem: 1,
  psm: 3,
};
 

tesseract.recognize("imgs/01.000.1.fg.01.jpg", config)
  .then(text => {
    console.log("Result:", text)
  })
  .catch(error => {
    console.log(error.message)
  })


// (async () => {

//     async function words() {
//         const files = await new Promise((resolve, reject) => {
//             fs.readdir('imgs/', (err, files) => {
//                 if (err) {
//                     reject(err);
//                 } else {
//                     resolve(files);
//                 }
//             })
//         });

//         const filtered = files.filter(file => file !== "Icon_");

//         // const mapped = await Promise.all(filtered.map((file) => {
//         //     return new Promise((resolve, reject) => {
//         //         okrabyte.decodeBuffer(fs.readFileSync("imgs/" + file), (err, data) => {
//         //             if (err) {
//         //                 return reject(err);
//         //             } else {
//         //                 resolve(data);
//         //             }
//         //         })
//         //     })
//         // }))

//         const mapped = await Promise.all(tesseract.recognize(filtered, config)
//         .then(text => {
//           console.log("Result:", text)
//         })
//         .catch(error => {
//           console.log(error.message)
//         }))

//         return mapped;
//     }

//     const teste = await words();

//     console.log(teste);
// })()