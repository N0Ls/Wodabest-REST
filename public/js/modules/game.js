import * as request from "../request.js";
import * as render from "../render.js";
import { apiRoutes } from "../routes.js";

let data,
    settings,
    forms = [];

const first_form = document.getElementById("form1"),
    second_form = document.getElementById("form2");

forms = [...forms, first_form, second_form];

forms.forEach(form => {
    form.onsubmit = async e => {
        e.preventDefault();

        const winner_id = form.winner.id,
            loser_id = form.loser.id;

        fetch("api/game/update", {
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": document.head.querySelector(
                    "[name=csrf-token][content]"
                ).content
            },
            method: "put",
            body: JSON.stringify({
                winner_id: winner_id,
                loser_id: loser_id
            })
        })
            .then(response => response.json())
            .then(data => {
                render.game(data.images);
            })
            .catch(error => {
                console.log(error);
            });
    };
});

const init = async route => {
    settings = request.initSettings(settings, "get");
    data = await request.initData(route, settings);
    render.game(data.images);
    //render.cleanLoader();
};

const route = apiRoutes.game.init;

//render.loader();

init(route);
