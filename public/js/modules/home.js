import * as request from "../request.js";
import * as render from "../render.js";
import { createRoute, webRoutes, apiRoutes } from "../routes.js";

let data, settings;

const gameLink = document.getElementById("game-link");

const init = async route => {
    settings = request.initSettings(settings, "get");
    data = await request.initData(route, settings);
    render.numbers(data);
    //render.cleanLoader();
    gameLink.href = createRoute(webRoutes.game.game);
};

const route = apiRoutes.home.init;

//render.loader();

init(route);
