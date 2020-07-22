function submit(){
  

  periodo_final = document.getElementsByName('periodo_final')[0].value;
  periodo_inicial = document.getElementsByName('periodo_inicial')[0].value
  exibir = document.getElementsByName('exibir')[0].value
  idioma = document.getElementsByName('idioma')[0].value
  palavra_chave = document.getElementsByName('palavra-chave')[0].value

  console.log(periodo_final,periodo_inicial,exibir,idioma,palavra_chave)
}
function onBuscaSimples() {
  document.getElementById("busca").innerHTML = `<form method="post" name="busca_simples" id="busca_simples">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group input-text-wrapper">
        <label class="control-label required" for="palavra-chave"> Buscar por palavra-chave </label>
        <input class="field field-required form-control" id="palavra-chave" name="palavra-chave"
          placeholder="Ex: Redes neurais, Visão Computacional ..."
          title="Ex: Redes neurais, Visão Computacional ..." type="text" value="" aria-required="true">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group input-text-wrapper">
        <label class="control-label required" for="exibir"> Exibir </label>
        <input class="field field-required form-control" id="exibir" name="exibir" type="number" value="5"
          maxlength="3" aria-required="true">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group input-select-wrapper has-success">
        <label class="control-label required" for="ordenar"> Idioma </label>
        <select class="form-control field-required success-field" id="idioma" name="idioma" aria-required="true">
          <option class="" selected="" value="portugues"> Portugues </option>
          <option class="" value="frances"> Francês </option>
          <option class="" value="italiano"> Italiano </option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <label class="control-label required" for="ordenar"> Periodo Inicial </label>
      <div class=" range-wrap">
        <div class="range-value" id="rangeV"></div>
        <input id="range" name="perido_incial" type="range" min="1917" max="1980" value="1947" step="1">
      </div>
    </div>

    <div class="col-md-3" style="margin-left: 25%;">
      <label class="control-label required" for="ordenar"> Periodo Final </label>
      <div class="range-wrap2">
        <div class="range-value2" id="rangeV2"></div>
        <input id="range2" name="perido_final" type="range" min="1917" max="1980" value="1948" step="1">
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-md-12">
      <button class="btn btn-primary right btn-default" id="buscar" type="submit">
        <span class="lfr-btn-label">Buscar</span> </button>
    </div>
  </div>
</form>`;
}

function onBuscaAvancada() {
  document.getElementById("busca").innerHTML = `<form
  method="post" name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_advancedSearchForm"
  id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_advancedSearchForm"> <input
    class="field field-required form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_advanced"
    name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_advanced" title="Avançado" type="hidden" value="true">
  <div class="data-checked-fields">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group input-select-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_degree"> Grau </label> <select
            class="form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_degree"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_degree">
            <option class="" value=""> </option>
            <option class="" value="11"> Dissertação </option>
            <option class="" value="14"> Tese </option>
          </select> </div>
      </div>
      <div class="col-md-6">
        <div class="form-group input-select-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_program"> Programa </label> <select
            class="form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_program"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_program">
            <option class="" value=""> </option>
            <option class="" value="1611"> Direito Constitucional (Dinter Ciesa / Unifor) </option>
            <option class="" value="1000"> Doutorado Em Administração De Empresas </option>
            <option class="" value="569"> Doutorado Em Direito Constitucional </option>
            <option class="" value="1023"> Doutorado Em Informática Aplicada </option>
            <option class="" value="1001"> Doutorado Em Psicologia </option>
            <option class="" value="1468"> Doutorado Em Saúde Coletiva </option>
            <option class="" value="1002"> Doutorado Em Saúde Coletiva - Aa </option>
            <option class="" value="58"> Mestrado Em Adm. (Financas) </option>
            <option class="" value="67"> Mestrado Em Administração De Empresas </option>
            <option class="" value="1405"> Mestrado Em Ciências Médicas </option>
            <option class="" value="84"> Mestrado Em Direito Constitucional </option>
            <option class="" value="81"> Mestrado Em Educacao Em Saude </option>
            <option class="" value="83"> Mestrado Em Informática Aplicada </option>
            <option class="" value="75"> Mestrado Em Psicologia </option>
            <option class="" value="231"> Mestrado Em Saúde Coletiva </option>
            <option class="" value="1498"> Mestrado Profissional Em Administração </option>
            <option class="" value="1619"> Mestrado Profissional Em Ciências Da Cidade </option>
            <option class="" value="1453"> Mestrado Profissional Em Direito E Gestão De Conflitos </option>
            <option class="" value="1580"> Mestrado Profissional Em Odontologia </option>
            <option class="" value="1612"> Mestrado Profissional Em Tecnologia E Inovação Em Enfermagem
            </option>
            <option class="" value="88"> Mestrado Profissionalizante Em Negocios Internacionais </option>
          </select> </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group input-text-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_title"> Título </label> <input
            class="field form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_title"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_title" type="text" value="" maxlength="200">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group input-text-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_author"> Autor </label> <input
            class="field form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_author"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_author" type="text" value="" maxlength="80">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group input-text-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_advisor"> Orientador </label> <input
            class="field form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_advisor"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_advisor" type="text" value="" maxlength="80">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group input-text-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_coorientator"> Coorientador </label> <input
            class="field form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_coorientator"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_coorientator" type="text" value=""
            maxlength="80"> </div>
      </div>
      <div class="col-md-4">
        <div class="form-group input-text-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_examinationBoard"> Banca examinadora </label>
          <input class="field form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_examinationBoard"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_examinationBoard" type="text" value=""
            maxlength="80"> </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group input-text-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_dateDefenseStart"> Data incial da defesa
          </label> <input class="field field-dateWithMask form-control hasDatepicker"
            id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_dateDefenseStart"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_dateDefenseStart" type="text" value=""
            maxlength="10"> </div>
      </div>
      <div class="col-md-4">
        <div class="form-group input-text-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_dateDefenseEnd"> Data final da defesa </label>
          <input class="field field-dateWithMask form-control hasDatepicker"
            id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_dateDefenseEnd"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_dateDefenseEnd" type="text" value=""
            maxlength="10"> </div>
      </div>
      <div class="col-md-4">
        <div class="form-group input-text-wrapper"> <label class="control-label"
            for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_subject"> Assunto </label> <input
            class="field form-control" id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_subject"
            name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_subject" type="text" value="" maxlength="80">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group input-text-wrapper"> <label class="control-label required"
          for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_recordsPerPageAdvanced"> Exibir </label> <input
          class="field field-required field-number form-control"
          id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_recordsPerPageAdvanced"
          name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_recordsPerPageAdvanced" type="number" value="5"
          maxlength="3" aria-required="true"> </div>
    </div>
    <div class="col-md-6">
      <div class="form-group input-select-wrapper has-success"> <label class="control-label required"
          for="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_sort"> Documentos ordenados por </label> <select
          class="form-control field-required success-field"
          id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_sort"
          name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_sort" aria-required="true">
          <option class="" selected="" value="DATA"> Data da defesa </option>
          <option class="" value="AUTOR"> Autor </option>
          <option class="" value="TITULO"> Título </option>
        </select> </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12"> <button class="btn btn-primary right btn-default"
        id="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_btn-advanced-search"
        name="_unifor_bdtd_bdtdPortlet_INSTANCE_XBblFAsO7Svx_btn-advanced-search" type="button"> <span
          class="lfr-btn-label">Buscar</span> </button> </div>
  </div>
</form>`;
}


const
  range = document.getElementById('range'),
  rangeV = document.getElementById('rangeV'),
  range2 = document.getElementById('range2'),
  rangeV2 = document.getElementById('rangeV2'),
  setValue = () => {
    const
      newValue = Number((range.value - range.min) * 100 / (range.max - range.min)),
      newPosition = 10 - (newValue * 0.2);
    rangeV.innerHTML = `<span>${range.value}</span>`;
    rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;

    const
      newValue2 = Number((range2.value - range2.min) * 100 / (range2.max - range2.min)),
      newPosition2 = 10 - (newValue2 * 0.2);
    rangeV2.innerHTML = `<span>${range2.value}</span>`;
    rangeV2.style.left = `calc(${newValue2}% + (${newPosition2}px))`;
  };
document.addEventListener("DOMContentLoaded", setValue);
range.addEventListener('input', setValue);
range2.addEventListener('input', setValue);














