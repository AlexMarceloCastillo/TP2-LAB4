const Express = require("express");
const Cors = require("cors");
const apiRoutes = require("./routes/index.routes");

const Server = Express();

// Settings
Server.use(Cors());
Server.use(Express.json());
Server.use(Express.urlencoded({extended:false}));

// Port
Server.set('port',2021);

// Routes
Server.get('/', (req,res) => res.send("Trabajo Practico N2 Parte A, Para Ver todos los paises ir a /api/v1/pais, para migrar los paises ir a /api/v1/pais/insertar"));
Server.use('/api/v1',apiRoutes);


module.exports = Server;
