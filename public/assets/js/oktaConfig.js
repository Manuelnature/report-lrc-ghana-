
(async function () {
    const baseUrl = `https://dev-60286648.okta.com`;
    try {
        const response = await fetch(baseUrl + '/api/v1/users', {
            credentials: 'include'
        });
        const me = await response.json();
        console.log(me);
    } catch (err) {
        console.error(err);
    }
})();