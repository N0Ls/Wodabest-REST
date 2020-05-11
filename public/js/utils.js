const exists = tag => {
    if (typeof tag != "undefined" && tag != null) return true;
    else return false;
};

const parseQueryString = query => {
    const vars = query.split("&");
    let query_string = {};
    for (var i = 0; i < vars.length; i++) {
        const pair = vars[i].split("=");
        const key = decodeURIComponent(pair[0]);
        const value = decodeURIComponent(pair[1]);
        if (typeof query_string[key] === "undefined") {
            query_string[key] = decodeURIComponent(value);
        } else if (typeof query_string[key] === "string") {
            const arr = [query_string[key], decodeURIComponent(value)];
            query_string[key] = arr;
        } else {
            query_string[key].push(decodeURIComponent(value));
        }
    }
    return query_string;
};

export { exists, parseQueryString };
