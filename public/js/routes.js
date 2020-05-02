const origin = window.location.origin;

const createRoute = route => {
    return origin + "/" + route;
};

const webRoutes = {
    home: {
        home: "home"
    },
    game: {
        game: "game"
    },
    images: {
        images: "images",
        ranking: "ranking",
        user: "user",
        edit: "edit",
        upload: "upload"
    }
};

const apiRoutes = {
    home: {
        init: "api/home/init"
    },
    game: {
        init: "api/game/init",
        update: "api/game/update"
    },
    images: {
        showAll: "api/images/showAll",
        showRanked: "../api/images/ranking/showRanked",
        showUser: "../api/images/user/showUser",
        showOne: "../../api/images/show",
        edit: "../../api/images/edit",
        update: "../../api/images/update",
        upload: "../api/images/upload/upload",
        store: "../api/images/upload/store"
    }
};

export { createRoute, webRoutes, apiRoutes };
