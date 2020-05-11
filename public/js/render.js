import { createRoute } from "./routes.js";
import * as util from "./utils.js";

const images = document.getElementById("images");
const mainSection = document.getElementById("content");

const location_origin = window.location.origin,
    imgs_public_path = "/img/uploads/",
    imgs_path = location_origin + imgs_public_path;

const loader = () => {
    let body = document.body,
        container = document.createElement('div'),
        loader = document.createElement('div');

    container.classList.add('loader_container');
    loader.classList.add('loader');
    container.appendChild(loader);
    body.prepend(container);
}

const cleanLoader = () => {
    let container = document.querySelector('.loader_container');
    container.remove();
}

const numbers = data => {
    let numbers = [],
        nbUsers = document.getElementById("nb-users"),
        nbProjects = document.getElementById("nb-images"),
        nbGames = document.getElementById("nb-games");

    numbers = [...numbers, nbProjects, nbUsers, nbGames];

    let i = 0;

    Object.entries(data.data).forEach(([key, value]) => {
        const n = numbers[i];
        n.innerHTML = value;
        i++;
    });
};

const userMessage = (tag, type, message) => {
    const container = document.createElement("div");
    container.classList.add("container", "mt-3");
    container.id = "user_message";
    container.innerHTML = `<div class="container mt-3">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="alert alert-${type} hidden margin-top-70">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <span>${message}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
    tag.prepend(container);
};

const cleanUserMessage = (tag, id) => {
    if (util.exists(document.getElementById(id))) {
        tag.removeChild(document.getElementById(id));
    }
};

const image = image => {
    let container = document.createElement("div");
    let cls = ["mix", "col-md-6", "col-lg-3"];
    container.classList.add(...cls);

    let element = `<a href="${createRoute(
        `images/${image.id}/show`
    )}" class="portfolio-item text-center">
                        <img src="../img/uploads/${image.filename}">
                        <div class="pi-inner">
                            <h2>Voir +</h2>
                        </div>
                    </a>
                    <div class="portfolio-meta">
                        <h2>${image.title}</h2>
                        <p>par ${image.user_id}</p>
                    </div>`;

    container.innerHTML = element;
    images.appendChild(container);
};

const userImage = image => {
    let container = document.createElement("div");
    let cls = ["mix", "col-md-6", "col-lg-3"];
    container.classList.add(...cls);

    let element = `<a href="${createRoute(
        `images/${image.id}/show`
    )}" class="portfolio-item text-center">
                        <img src="../img/uploads/${image.filename}">
                        <div class="pi-inner">
                            <h2>Voir +</h2>
                        </div>
                    </a>
                    <div class="portfolio-edit">
                        <a href="${createRoute(
                            `images/${image.id}/edit`
                        )}" class="rkmd-btn btn-fab-mini btn-dark"><span class="fa fa-pencil"></span></a>
                        <form>
                            <button class="rkmd-btn btn-fab-mini btn-pink"><span class="fa fa-trash"></span></button>
                        </form>
                    </div>
                    <div class="portfolio-meta">
                        <h2>${image.title}</h2>
                        <p>par ${image.user_id}</p>
                    </div>`;

    container.innerHTML = element;
    images.appendChild(container);
};

const mainImage = image => {
    let container = document.createElement("section");
    container.classList.add("details-section");

    let element = `<div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <figure class="pic-frame">
                                    <img src="../../img/uploads/${
                                        image.filename
                                    }" alt="">
                                </figure>
                            </div>
                            <div class="col-lg-6 offset-lg-1">
                                <p>${image.description}</p>
                                <div class="row mt-5 text-center">
                                    <div class="col-md-4">
                                        <div class="milestone">
                                            <h2>${image.wins +
                                                image.losses}<span>Matchs</span></h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="milestone">
                                            <h2>${
                                                image.wins
                                            }<span>Victoires</span></h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="milestone">
                                            <h2>${
                                                image.losses
                                            }<span>Défaites</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

    container.innerHTML = element;
    mainSection.appendChild(container);
};

const comments = () => {

}

const editForm = image => {
    const form = document.getElementById("editForm");
    form.title.value = image.title;
    form.description.value = image.description;
};

const uploadForm = categories => {
    const form = document.getElementById("categories");

    let container, input, label, cls;

    Object.entries(categories).forEach(([key, value]) => {
        container = document.createElement("div");
        cls = ["form-check", "form-check-inline", "mr-2"];
        container.classList.add(...cls);

        input = document.createElement("input");
        input.classList.add("form-check-input");
        input.type = "radio";
        input.name = "category";
        input.id = categories[key].id;
        input.value = categories[key].slug;

        label = document.createElement("label");
        label.classList.add("form-check-label");
        label.setAttribute("for", input.name);
        label.innerHTML = categories[key].name;

        container.appendChild(input);
        container.appendChild(label);
        form.appendChild(container);
    });
};

const game = images => {
    let forms = [], imgs = [], titles = [];

    const first_form = document.getElementById("form1"),
        second_form = document.getElementById("form2"),
        img1 = document.getElementById("img1"),
        img2 = document.getElementById("img2"),
        title1 = document.getElementById("title1"),
        title2 = document.getElementById("title2");

    forms = [...forms, first_form, second_form];
    imgs = [...imgs, img1, img2];
    titles = [...titles, title1, title2];

    let a = 0,
        b = 1,
        c = 0;

    for (let i = 0; i < 2; i++) {
        if (i == 1) {
            a = b;
            b = c;
        }
        forms[i].winner.id = images[a].id;
        forms[i].loser.id = images[b].id;
        forms[i].winner.value = images[a].id;
        forms[i].loser.value = images[b].id;
        imgs[i].src = imgs_path + images[a].filename;
        titles[i].innerHTML = images[a].title;
    }
};

const allImages = images => {
    Object.entries(images).forEach(([key, value]) => {
        if (images[key].user_id == 3) userImage(images[key]);
        else image(images[key]);
    });
};

export {
    loader,
    cleanLoader,
    numbers,
    userMessage,
    cleanUserMessage,
    image,
    userImage,
    mainImage,
    editForm,
    uploadForm,
    game,
    allImages
};
