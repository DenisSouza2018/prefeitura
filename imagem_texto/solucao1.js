const fs = require("fs");
const tesseract = require("node-tesseract-ocr");
const okrabyte = require("okrabyte");
const delay = require('delay');
const contentFilePath = './txt/';
// Biblioteca https://www.npmjs.com/package/node-tesseract-ocr



(async () => {

    async function getInfo(name_img) {
        let result = '';
        result = await tesseract.recognize("imgs/" + name_img, {
            load_system_dawg: 0,
            tessedit_char_whitelist: "0123456789",
            presets: ["txt"],
        })
        let name = name_img.substr(0, (name_img.length - 3)) + "txt";
        let caminho = contentFilePath + name;
        
        console.log("Results: ",result.length);

        if (result.length > 10) {
            fs.writeFileSync(caminho, result);
            return result;
        }else{
            return "Erro: "+name_img;
        }
        
        //return result;
    }

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
        console.log(filtered.length)

        let cont = 0;

        while (cont != filtered.length) {
            console.log(filtered[cont]);
            let result = await getInfo(filtered[cont]);

            if (result == '' || result == undefined) {
                //console.log('vazio');
            } else {
                //console.log(result);
                if (cont != filtered.length) {
                    cont++;
                }
            }
        }

        if (cont == filtered.length) {
            console.log("Finalizou");
        }
        //return result;
    }

    const teste = await words();
    if (teste != undefined) {
        // console.log(teste);
    }

})()