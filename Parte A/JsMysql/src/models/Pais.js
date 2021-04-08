module.exports = (sequelize, type) => {
    return sequelize.define('pais',{
        codigoPais: {
            type: type.INTEGER,
            primaryKey: true,
            allowNull: false
        },
        nombrePais: {
            type: type.STRING(50),
            allowNull: false
        },
        capitalPais: {
            type: type.STRING(50),
            allowNull: false
        },
        region: {
            type: type.STRING(50),
            allowNull: false
        },
        poblacion: {
            type: type.BIGINT,
            allowNull: false
        },
        latitud: {
            type: type.FLOAT,
            allowNull: false
        },
        longitud: {
            type: type.FLOAT,
            allowNull: false
        }
    },{
        timestamps: false
    });
};
