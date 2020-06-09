//https://www.youtube.com/watch?v=BFOeM8ATWdk
//https://console.developers.google.com/apis/api/vision.googleapis.com/metrics?project=theta-decker-279413
const express = require('express');
const app = express();
const vision = require('@google-cloud/vision');
const fs = require("fs");
const contentFilePath = './txt/';
const arquivosReprovados = [];
// Creates a client
const client = new vision.ImageAnnotatorClient({
  keyFilename: 'APIKey.json'
});


// client
//   .textDetection('./img/01.000.1.fg.01.jpg')
//   .then(results => {
//       //console.log(results)
//     // const labels = results[0].labelAnnotations;
//      const texto = results[0].fullTextAnnotation.text;
//      //console.log(texto);
//      fs.writeFileSync(contentFilePath+'arquivo1'+'.txt',texto);
//     // labels.forEach(label => console.log(label));
//     // //console.log(results);
//   })
//   .catch(err => {
//     console.error('ERROR:', err);
//   });

(async () => {



  async function getInfo(name_img) {
    let verifica = false;
    await client
      .textDetection('./img/' + name_img)
      .then(results => {
        // Pega todo o texto
        const texto = results[0].fullTextAnnotation.text;
       
        // Remove altera a extenção
        name = name_img.substr(0,(name_img.length - 3)) + 'txt'
        fs.writeFileSync(contentFilePath + name, texto);
        
        // Verifica de o texto é maior que 10 caracteres
        if (texto.length > 10) {
          verifica = true;
        }

      })
      .catch(err => {
        console.error('ERROR:', err);
      });

    // Condição responsavel por verificar se a imagem foi lida
    if (!verifica) {
      arquivosReprovados.push(name_img);
    }

    return verifica;

  }


  async function words() {
    const files = await new Promise((resolve, reject) => {
      fs.readdir('img/', (err, files) => {
        if (err) {
          reject(err);
        } else {
          resolve(files);
        }
      })
    });

    const filtered = files.filter(file => file !== "Icon_");
    console.log(filtered.length)

    let cont = 0;

    while (cont != filtered.length) {
      console.log(filtered[cont]);
      let result = await getInfo(filtered[cont]);

      if (result) {
        console.log(result);
        if (cont != filtered.length) {
          cont++;
        }
      } else {
        console.log("Erro: ", result);
      }
    }

    if (cont == filtered.length) {
      console.log("Finalizou");
      fs.writeFileSync(contentFilePath + 'Arquivos Reprovados.txt', "Quantidade: "+arquivosReprovados.length+ "| Arquivos-->  "+arquivosReprovados);
    }
    //return result;
  }

  const teste = await words();
  if (teste != undefined) {
    // console.log(teste);
  }

})()



app.listen(5000, '127.0.0.1', () => console.log('Server running'));
