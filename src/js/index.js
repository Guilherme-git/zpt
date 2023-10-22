const search_input = document.getElementById("search_ip")
const ip = document.getElementById("ip")
const host = document.getElementById("host")
const city = document.getElementById("city")
const region = document.getElementById("region")
const country = document.getElementById("country")
const postal = document.getElementById("postal")

try {
    fetch('https://ipinfo.io/json?token=bd306fcfb06d5e')
        .then(T => T.json())
        .then(resonse => {
                if (resonse.status == 404) {
                    return alert("Informe um endereço de IP válido")
                }
                if (resonse.error) {
                    return alert("Ocorreu algum problema, tente novamente!")
                }
                ip.innerHTML = resonse.ip
                host.innerHTML = resonse.hostname
                city.innerHTML = resonse.city
                region.innerHTML = resonse.region
                country.innerHTML = resonse.country
                postal.innerHTML = resonse.postal
            }
        ).catch(response => alert("Ocorreu algum problema, tente novamente!"))
} catch (error) {
    alert("Ocorreu algum problema, tente novamente!")
}

function search() {
    const value = search_input.value
    if (!value) {
        return alert("Informe um IP")
    }

    try {
        fetch(`https://ipinfo.io/${value}?token=bd306fcfb06d5e`)
            .then(T => T.json())
            .then(resonse => {
                    if (resonse.status == 404) {
                        return alert("Informe um endereço de IP válido")
                    }
                    if (resonse.error) {
                        return alert("Ocorreu algum problema, tente novamente!")
                    }
                    ip.innerHTML = resonse.ip
                    host.innerHTML = resonse.hostname ? resonse.hostname : "---"
                    city.innerHTML = resonse.city ? resonse.city : "---"
                    region.innerHTML = resonse.region ? resonse.region : "---"
                    country.innerHTML = resonse.country ? resonse.country : "---"
                    postal.innerHTML = resonse.postal ? resonse.postal : "---"

                }
            ).catch(response => alert("Ocorreu algum problema, tente novamente!"))
    } catch (error) {
        return console.log(error)
        return alert("Ocorreu algum problema, tente novamente!")
    }
}