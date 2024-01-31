const { faker } = require('@faker-js/faker');

function createRandomUser() {
  return {
    userId: faker.string.uuid(),
    username: faker.internet.userName(),
    noemp: faker.internet.noemp(),
    nom: faker.internet.name(),
    prenom: faker.internet.prenom(),
    email: faker.internet.email(),
    avatar: faker.image.avatar(),
    password: faker.internet.password(),
    birthdate: faker.date.birthdate(),
    registeredAt: faker.date.past(),
  };
}

const USERS = faker.helpers.multiple(createRandomUser, {
  count: 5,
});

console.log(USERS)