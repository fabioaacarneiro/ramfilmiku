document.addEventListener("DOMContentLoaded", () => {

    const optionDataHandler = (select, table, nameError) => {
        fetch(`../includes/optionsData.php/?option=${table}`).then((res) => {
            if (!res.ok) {
                console.error(`Erro ao carregar os ${nameError}`);
            }
            return res.json()
        }).then((data) => {
            data.forEach(dataItem => {
                const option = document.createElement('option')

                if (table === "classificacao_etaria") {
                    option.value = dataItem.codigo
                    option.textContent = dataItem.descricao
                } else {
                    option.value = dataItem.id
                    option.textContent = dataItem.nome
                }

                document.querySelector(select).appendChild(option)
            });
        }).catch((err) => {
            alert(err.message)
        })
    }

    optionDataHandler("#generos", "generos", "gêneros")
    optionDataHandler("#pais", "pais", "pais")
    optionDataHandler("#tipos", "tipos", "tipos")
    optionDataHandler("#classificacao_etaria", "classificacao_etaria", "classificacao_etaria")

})