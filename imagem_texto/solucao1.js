const fs = require("fs");
const tesseract = require("node-tesseract-ocr");
const okrabyte = require("okrabyte");
const delay = require('delay');
const contentFilePath = './txt/';
// Biblioteca https://www.npmjs.com/package/node-tesseract-ocr

// Solução 1
// let ImagensOff = [];
// let contImg = 0;
// (async () => {

//     async function getInfo(name_img, img_qtd, cont) {
//         let result = '';
//         result = await tesseract.recognize("imgs/" + name_img, {
//             load_system_dawg: 0,
//             tessedit_char_whitelist: "0123456789",
//             presets: ["txt"],
//         })
//         let name = name_img.substr(0, (name_img.length - 3)) + "txt";
//         let caminho = contentFilePath + name;

//         if (result.length > 10) {
//             fs.writeFileSync(caminho, result);
//             //console.log("Imprimiu: ", contImg++);

//         } else {
//             ImagensOff.push(name_img);
//         }

//         return result;
//     }



//     async function words() {

//         // Files receber um vetor com todos os nomes
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

//         vet = '';

//         let cont = 0;
//         console.log("Quantidade de img a ser lidas: ", filtered.length);
//         while (cont != filtered.length) {
//             console.log(filtered[cont]);
//             let result = await getInfo(filtered[cont], filtered.length, cont);

//             if (result == '' || result == undefined) {
//                 //console.log('vazio');
//             } else {
//                 //console.log(result);
//                 if (cont != filtered.length) {
//                     cont++;
//                     console.log('Imagem verificada: ', cont);
//                 }
//             }
//         }

//         let filtered2;
//         if(ImagensOff.length === filtered.length - contImg){
//             fs.writeFileSync(contentFilePath+'Arquivos_nao_lidos.txt', 'Quantidade: '+contImg+' - '+ImagensOff);
//             console.log("Quantidade de img a ser lidas Segunda vez: ",ImagensOff.length);
//             cont = 0;
//             filtered2 = ImagensOff;
//             ImagensOff = [];
//             contImg = 0;

//             while (cont != filtered2.length) {
//                 //console.log(filtered[cont]);
//                 let result = await getInfo(filtered2[cont], filtered2.length, cont);
    
//                 if (result == '' || result == undefined) {
//                     //console.log('vazio');
//                 } else {
//                     //console.log(result);
//                     if (cont != filtered2.length) {
//                         cont++;
//                         console.log('Imagem verificada: ', cont);
//                     }
//                 }
//             }
//         }
        

//         if (cont == filtered.length || cont == filtered2.length) {
//             console.log("Finalizou");
//         }
//         //return result;
//     }

//     const teste = await words();
//     if (teste != undefined) {
//         // console.log(teste);
//     }

// })()

//********************************************************************** */
// Solução 2 
//export GOOGLE_APPLICATION_CREDENTIALS = "credenciais/key.json";
//const vision = require('@google-cloud/vision');

// Creates a client
//const client = new vision.ImageAnnotatorClient();

/**
 * TODO(developer): Uncomment the following line before running the sample.
 */
// const fileName = 'Local image file, e.g. /path/to/image.png';

// Performs text detection on the local file
// Imports the Google Cloud client library.
const {Storage} = require('@google-cloud/storage');

// Instantiates a client. If you don't specify credentials when constructing
// the client, the client library will look for credentials in the
// environment.
const storage = new Storage();

try {
  // Makes an authenticated API request.
  const results = await storage.getBuckets();

  const [buckets] = results;

  console.log('Buckets:');
  buckets.forEach((bucket) => {
    console.log(bucket.name);
  });
} catch (err) {
  console.error('ERROR:', err);
}
// async function quickstart() {
//   // Imports the Google Cloud client library
//   const vision = require('@google-cloud/vision');

//   // Creates a client
//   const client = new vision.ImageAnnotatorClient();

//   // Performs label detection on the image file
//   const [result] = await client.labelDetection('/imgs/cv1.jpg');
//   const labels = result.labelAnnotations;
//   console.log('Labels:');
//   labels.forEach(label => console.log(label.description));
// }
// quickstart().catch(console.error);


// (async () => {


//     async function words() {
  
//       // Files receber um vetor com todos os nomes
//       const files = await new Promise((resolve, reject) => {
//         fs.readdir('imgs/', (err, files) => {
//           if (err) {
//             reject(err);
//           } else {
//             resolve(files);
//           }
//         })
//       });
  
//       const filtered = files.filter(file => file !== "Icon_");
//       // let cont = 0;
//       // while (cont != filtered.length) {
  
//       // }
     
//       const [result] = await client.textDetection('imgs/'+filtered[0]);
//       const detections = result.textAnnotations;
//       console.log('Text:');
//       detections.forEach(text => console.log(text));
//     }
  
//     const teste = await words();
//     if (teste != undefined) {
//       // console.log(teste);
//     }
  
//   })()