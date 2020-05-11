const type = "module";

const urlLength = window.location.pathname.split('/').length;
const filename = window.location.pathname.split('/')[1] + '.js';

Document.prototype.loadDynamicScript = callback => {
    const existingScript = document.getElementById("main-script");

    if (!existingScript) {
        const script = document.createElement("script");
        script.id = "main-script";
        script.src = urlLength > 3 ? `../../js/${type}s/${filename}` : `../js/${type}s/${filename}`;
        script.type = "module";
        document.body.appendChild(script);

        script.onload = () => {
            if (callback) callback();
        };
    }
    if (existingScript && callback) callback();
};

Document.prototype.ready = callback => {
    if (callback && typeof callback === "function") {
        document.addEventListener("DOMContentLoaded", () => {
            if (
                document.readyState === "interactive" ||
                document.readyState === "complete"
            ) {
                return callback();
            }
        });
    }
};

document.ready(() => {
    console.log("DOM loaded successfully");
    document.loadDynamicScript(() => {
        console.log("Script(s) loaded successfully");
    });
});
