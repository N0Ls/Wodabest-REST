import * as request from "../request.js";
import { apiRoutes } from "../routes.js";
import * as render from "../render.js";
import { exists } from "../utils.js";

// Images url specifier
const imagesUrl = window.location.pathname.substring(
    window.location.pathname.lastIndexOf("/") + 1
);

let method;

// Request methods
const get = "GET",
    post = "POST",
    put = "PUT";

let imageId, data, settings;

if (imagesUrl == "edit" || imagesUrl == "show")
    imageId = window.location.pathname.split("/")[2];

// Edit form
if (exists(document.getElementById("editForm"))) {
    const form = document.getElementById("editForm"),
        title = form.title,
        description = form.description,
        id = window.location.pathname.split("/")[2];

    form.onsubmit = async e => {
        e.preventDefault();

        fetch(apiRoutes.images.update + "/" + imageId, {
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": document.head.querySelector(
                    "[name=csrf-token][content]"
                ).content
            },
            method: put,
            body: JSON.stringify({
                id: id,
                title: title.value,
                description: description.value
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success)
                    render.userMessage(form, "success", data.message);
            })
            .catch(error => {
                console.log(error);
            });

        // Best way (but not working) : by passing the body to the optionnal parameter of initSettings function

        /*settings = request.initSettings(
            settings,
            post,
            JSON.stringify({
                id: id,
                title: title.value,
                description: description.value
            })
        );

        data = await request.initData(
            apiRoutes.images.update + "/" + imageId,
            settings
        );

        console.log(data);*/
    };
}

// Upload form
/*if (exists(document.getElementById("uploadForm"))) {
    const form = document.getElementById("uploadForm");
    form.onsubmit = async e => {
        const title = form.title.value,
            description = form.description.value,
            file = document.getElementById("file").value,
            category = document.querySelector('input[name="category"]:checked').id;

        e.preventDefault();

        fetch(apiRoutes.images.store, {
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": document.head.querySelector(
                    "[name=csrf-token][content]"
                ).content
            },
            method: post,
            body: JSON.stringify({
                title: title,
                description: description,
                category: category,
                file: file
            })
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                if (data.success)
                    render.userMessage(form, "success", data.message);
            })
            .catch(error => {
                render.userMessage(form, "error", "An error occured");
                console.log(error);
            });
    };
}*/

// Object literal for routes
const routeSwitch = url => {
    const Routes = {
        images: apiRoutes.images.showAll,
        ranking: apiRoutes.images.showRanked,
        user: apiRoutes.images.showUser,
        show: apiRoutes.images.showOne + "/" + imageId,
        edit: apiRoutes.images.edit + "/" + imageId,
        upload: apiRoutes.images.upload
    };
    return Routes[url];
};

// Init
const init = async (route, method) => {
    settings = request.initSettings(settings, method);
    console.log(settings);
    data = await request.initData(route, settings);
    if (data.data.image)
        if (imagesUrl == "edit") render.editForm(data.data.image);
        else render.mainImage(data.data.image);
    else if (imagesUrl == "upload") render.uploadForm(data.data.categories);
    else render.allImages(data.data.images);
    //render.cleanLoader();
};

// Route attribution
const route = routeSwitch(imagesUrl);

// Method attribution
method = get;

//render.loader();

// Call init with specific route and request method
init(route, method);
