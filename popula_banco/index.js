const express = require('express');
const app = express();
const port = 3000; //porta padrão
const mysql = require('mysql');
var fs = require('fs');


const cliente = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'museu',
    port: 3306
});
cliente.connect(function (err) {
    if (err) {
        console.log("Banco não conectado, alterar string de conexão !");
    }
    else
        console.log('API funcionando!');
});

(async () => {


    async function words() {
        const files = await new Promise((resolve, reject) => {
            fs.readdir('txt/', (err, files) => {
                if (err) {
                    reject(err);
                } else {
                    resolve(files);
                }
            })
        });

        const filtered = files.filter(file => file !== "Icon_");

        let todosDados = [];

        for (let index = 0; index < filtered.length; index++) {
            const element = filtered[index];
            const data = fs.readFileSync(`txt/${element}`,
                { encoding: 'utf8', flag: 'r' });
            let sequencia = data.split('\n');
            let textoUnico = '';

            for (let j = 0; j < sequencia.length; j++) {
                const e = sequencia[j];

                if (e.charAt(e.length - 1) === '-') {
                    textoUnico += e.substr(e,e.length-1).replace(/"/g, '');
                }else{
                    
                    textoUnico += e.replace(/"/g, '')+" ";
                }
               
            }

            texto = `${filtered[index]}` + ' |+| ' + `${textoUnico}`;
            todosDados[index] = texto;

        }


        // todosDados.forEach(e =>{
        //     console.log(e.split('|+|')[0])


        // })



        console.log(todosDados.length)
        // Loop responsavel por inserir todo array no banco 
        for (var k = 0; k < todosDados.length; k++) {
            let nome = todosDados[k].split('|+|')[0];
            let descricao = todosDados[k].split('|+|')[1];

            var sql = `SELECT h.nome FROM hemeroteca h WHERE h.nome = '${nome}'; `;
            (function () {
                var kCopy = k;

                cliente.query(sql, [kCopy], function (err, results, field) {

                    if (results.length == 0) {
                        var sql2 = `INSERT INTO hemeroteca VALUES
                        (0,'${nome}','','',"${descricao}",'brasileiro');`;

                        cliente.query(sql2, function (err, results, field) { 

                            if(err === null){
                                console.log("Sucesso !")
                            }else{
                                console.log("Erro ao inserir !")
                            }
                        });
                    }else{
                        console.log("Arquivo já Inserido !");
                        console.log(descricao);
                    }
                });
            }());
        }


    }

    const teste = await words();


})()



app.listen(port);


