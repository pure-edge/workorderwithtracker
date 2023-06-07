import { initializeApp } from 'firebase-admin';

//var serviceAccount = require('./bilecoapp-637a3-firebase-adminsdk-p6riz-a6e7c30693.json');

const defaultApp = initializeApp({
  serviceAccount: './bilecoapp-637a3-firebase-adminsdk-p6riz-a6e7c30693.json',
  databaseURL: "https://bilecoapp-637a3.firebaseio.com"
});

var auth = defaultApp.auth();
var db = defaultApp.database();

console.log('test');