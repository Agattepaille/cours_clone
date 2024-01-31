let image = [];
image[0] = "../view/assets/coins.png";
image[1] = "../view/assets/coins2.png";
image[2] = "../view/assets/coins3.png";
image[3] = "../view/assets/coin4.png";

let size = image.length;
let x = Math.floor(size * Math.random());

$('#random').attr('src', image[x]);

