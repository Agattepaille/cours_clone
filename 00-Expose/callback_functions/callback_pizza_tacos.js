const pizza = 'pizzaaa';
const tacos = 'tacooos';

function orderFood(callback, foodType) {
    setTimeout(() => {

        if (foodType === 'pizza') {
            callback(pizza);
        } else if (foodType === 'tacos') {
            callback(tacos);
        } else {
            console.log('Invalid food type');
        }
    }, 2000);
}

function foodReady(food) {
    console.log(`Eat the ${food}`);
}

orderFood(foodReady, 'pizza'); 
// or orderFood(foodReady, 'tacos');
