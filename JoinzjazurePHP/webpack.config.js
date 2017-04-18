var webpack = require('webpack');
var path = require('path');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
module.exports = function(env) {
    return {
        entry: {
            app:['./Scripts/index.js'],
            vendor: ['jquery-validation','jquery-validation-unobtrusive','jquery',],
            style:['bootstrap','./Content/site.css','./Content/vendor.js']
        },
        output: {
            filename: '[name].js',
            path: path.resolve(__dirname, 'public/')
        },
        module: {
         rules: [{
             test: /\.css$/,
             use: ExtractTextPlugin.extract({
                 use: 'css-loader'
            })
        },
        {
            test: /\.(png|jpg|jpeg|gif|woff)$/,
            loader: 'file-loader?name=./Images/[name].[ext]'
        },
                    {
                test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                loader: 'file-loader?name=./fonts/[name].[ext]'
            }
        ]
     },
        plugins: [
            new webpack.optimize.CommonsChunkPlugin({
                names: ['vendor']
            }),
            new ExtractTextPlugin('./styles.css'),
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery'
            })
        ]
    }
};