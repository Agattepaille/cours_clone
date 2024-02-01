function orderPizza(callback) {
    console.log('Order pizza');
    setTimeout(() => {
        const pizza = 'pizzaaa';
        callback(pizza)
    }, 2000);
}

function pizzaReady(pizza) {
    console.log(`Eat the ${pizza}`)
}

orderPizza(pizzaReady)
console.log('Call mum')