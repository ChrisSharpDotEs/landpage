export const HttpClient = {
    post(url, datos, action) {
        fetch(url, {
            method: 'POST',
            body: datos
        })
        .then(response => {
            if (response.ok && response.status == 200) {
                return response.json();
            }
        })
        .then(data => {
            action(data);
        })
        .catch(error => console.error(error));
    },
    get(url) {
        return fetch(url)
        .then(response => {
            if (response.ok && response.status == 200) {
                return response.text();
            }
        })
    }
}