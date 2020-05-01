const initSettings = (settings, type, body = null) => {
    return settings = {
        methods: type,
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document.head.querySelector(
                "[name=csrf-token][content]"
            ).content
        },
        body : body ? body : null
    };
}

const logResponse = data => {
    Object.entries(data.data).forEach(([key, value]) => {
        console.log(key + " : " + value);
    });
};

const initData = async (route, settings) => {
    try {
        console.log("Request to : " + route);
        console.log("Method : " + settings.methods);
        const response = await fetch(route, settings);
        return response.json();
    } catch (e) {
        console.log(e);
    }
};

export { initSettings, logResponse, initData }