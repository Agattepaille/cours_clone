async function fetchData() {
    try {
        const response = await fetch('https://jsonplaceholder.typicode.com/users?id=6');
        const data = await response.json();
        console.log(data[0].name);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}
fetchData();