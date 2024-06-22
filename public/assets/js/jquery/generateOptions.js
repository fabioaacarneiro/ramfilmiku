
$(document).ready(() => {
    // alimentar o select de gêneros
    $.ajax({
        url: '../includes/buscarGeneros.php',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, genero) {
                $('#generos').append('<option value="' + genero.id + '">' + genero.nome + '</option>')
            })
        },
        error: function () {
            alert('Erro ao carregar os gêneros')
        }
    })

    // alimentar o select de países
    $.ajax({
        url: '../includes/buscarPais.php',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, pais) {
                $('#pais').append('<option value="' + pais.id + '">' + pais.nome + '</option>')
            })
        },
        error: function () {
            alert('Erro ao carregar países')
        }
    })

    // alimentar o select de tipos
    $.ajax({
        url: '../includes/buscarTipos.php',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, tipos) {
                $('#tipos').append('<option value="' + tipos.id + '">' + tipos.nome + '</option>')
            })
        },
        error: function () {
            alert('Erro ao carregar os tipos')
        }
    })

    // alimentar o select de classficação etária
    $.ajax({
        url: '../includes/buscarClassificacaoEtaria.php',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, classificacaoEtaria) {
                $('#classificacao_etaria').append('<option value="' + classificacaoEtaria.codigo + '">' + classificacaoEtaria.descricao + '</option>')
            })
        },
        error: function () {
            alert('Erro ao carregar os classificação etária')
        }
    })
})