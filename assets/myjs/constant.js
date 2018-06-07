angular.module('rentalConstant', [])
        .constant('AUTHURLS', {
            API_BASE_URL: 'http://localhost/rentalsystem/',
        })
        .constant('USER_MANAGE_URL', {
            REGISTER: 'registerUser',
            CHECKUSER: 'checkUserName',

        })
        .constant('LOGINURL', {
            LOGIN: 'login',
            GET_SESSION: 'getSession',
            HOME: ''

        })
        .constant("POSTURL", {
            GETCATEGORY: 'getCategory',
            GET_AUTOMOBILES_CATEGORY: 'automobileCategory',
            GET_AUTOMOBILES_MANUFRACTURER: 'getAutomobileManufacturer',
            GET_MANUFRACTURER_MODELS: 'getManufracturerModels',
            GET_STATES: 'states',
            GET_CITIES: 'cities',
            SAVE_POST: 'savePost',
            DELETE_POST: 'deletePost',
            SAVE_CLOTHING_POST: 'saveClothingPost',
            GET_POSTS: "getVehiclePosts",
            GET_CLOTHING_POSTS: "getClothingPosts",
            GET_FURNITURE_POSTS: "getFurniturePosts",
            GET_ALL_POSTS: "allPosts",
            GET_MY_ALL_POSTS: "getMyAllPosts",
            GET_FILE_PATHS: "getFilePaths",
            UPLOAD_ATTACHMENT: "uploadAttachment",
            GET_CLOTHING_TYPE: "getClothingType",
            GET_CLOTHING_SIZE: "getClothingSize",
            GET_CLOTHING_CATEGORY: "getClothingCategory",
            GET_CLOTHING_MANUFACTURER: "getClothingManufacturer",
            GET_FURNITURE_TYPE: "getFurnitureType",
            GET_FURNITURE_CATEGORY: "getFurnitureCategory",
            GET_FURNITURE_MATERIAL: "getFurnitureMaterial",
            SAVE_FURNITURE_POST: "saveFurniturePost",

        })
        .constant("MYDATA", {
            GET_PROFILE: 'getProfile',
            UPDATE_PROFILE: 'updateProfile',
        })





         