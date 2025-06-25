// webpack.config.js
const Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .addEntry('app', './assets/app.js')

  .copyFiles({
    from: './assets/images',
    to: 'images/[path][name].[ext]'
  })

  // <-- Ajoutez cette ligne :
  .enableSingleRuntimeChunk()

  .enableSassLoader(options => ({
    sassOptions: { indentedSyntax: true }
  }))
  .cleanupOutputBeforeBuild()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())

  
  
;

module.exports = Encore.getWebpackConfig();

