import axios from 'axios'

export const HTTP = axios.create({
<<<<<<< HEAD
    baseURL: `http://api.yboard:8000/v1`,
=======
    baseURL: `http://10.0.0.140:1709/v1`,
>>>>>>> origin/frontArtur
    headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'GET,HEAD,OPTIONS,POST,PUT',
        'Access-Control-Allow-Headers': 'X-CSRF-Token, Origin, X-Requested-With, Content-Type, Accept, Authorization',
        'Access-Control-Allow-Credentials': true,
    }
})
