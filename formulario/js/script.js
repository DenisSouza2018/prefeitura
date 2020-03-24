/**
 * Created by José on 22/05/15.
 */

function tipoCadastro(tipo){
    var opcoes = document.getElementById('opcoes');
    var conta = document.getElementById('contas');
    var cheque = document.getElementById('cheques');
    var form_conta = document.getElementById('form-contas');
    var form_cheque = document.getElementById('form-cheques');
    var lista_itens = document.getElementById('lista-itens');
    var btn_voltar = document.getElementById('alinha-botao-voltar') ;
    var paginacao = document.getElementById('paginacao');

    if(tipo == 'conta'){
        opcoes.style.display = 'none';
        form_conta.style.display = 'block';
        /*lista_itens.style.display = 'block';
        btn_voltar.style.display = 'block';
        paginacao.style.display = 'block';*/

    }
    if(tipo == 'cheque'){
        opcoes.style.display = 'none';
        form_cheque.style.display = 'block';
        /*lista_itens.style.display = 'block';
        btn_voltar.style.display = 'block';
        paginacao.style.display = 'block';*/
    }
}

window.onload = function(){
    id('input-valor').onkeydown = function () {
        mascara(this, mvalor);
    };

    id('input-multa').onkeyup = function () {
        mascara(this, mvalor);
    };

    id('input-juros').onkeydown = function () {
        mascara(this, mvalor);
    };

    id('input-agencia').onkeyup = function () {
        mascara(this, mBanco);
    };

    id('input-conta').onkeydown = function () {
        mascara(this, mBanco);
    };

    id('input-valor-cheque').onkeydown = function () {
        mascara(this, mvalor);
    };

    addOutroTipo();
};

function addOutroTipo(){
    var divOutro = document.getElementById('div-outro-tipo');
    var el = document.getElementById('outroTipo');
    var label = document.getElementById('lbl-tipo');
    var labelOutro = document.getElementById('lblOutroTipo');
    var divSelect = document.getElementById('div-select');

    document.getElementById('select-tipo').addEventListener('change', function(){
        if(this.value === 'outro') {
            divOutro.style.display = 'block';
            label.style.display = 'none';
            labelOutro.style.display = 'block';
            el.style.display = 'block';
            divSelect.style.display = 'none';
        } else {
            divOutro.style.display = 'none';
            label.style.display = 'block';
            labelOutro.style.display = 'none';
            el.style.display = 'none';
            divSelect.style.display = 'block';
        }
    });
}

function mascara(o,f){
    v_obj = o;
    v_fun = f;
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value = v_fun(v_obj.value)
}

function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares

    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
}

function mBanco(v){
    v = v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v = v.replace(/(\d)(\d{1})$/, "$1-$2"); //Coloca hifen antes do ultimo digito

    return v;
}

function id(el){
    return document.getElementById(el);
}
