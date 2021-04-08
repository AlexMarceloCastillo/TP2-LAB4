const router = require('express').Router();
const  paisController  = require('../controllers/pais.controller');

router.route('/pais/')
    .get(paisController.getAll);

router.route('/pais/insertar')
    .get(paisController.setData);


module.exports = router;
