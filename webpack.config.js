const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    entry: './assets/app.js',
    output: {
        filename: 'app.bundle.js',
        path: __dirname + '/assets/dist'
    },

    module: {
        rules: [
            {
                test: /\.scss*/, use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            publicPath: './assets/dist/'
                        }
                    },

                    'css-loader', 'sass-loader'
                ]
            },
            {
                test: /\.(png|svg|jpg|gif)$/,
                exclude: /\.(png|svg|jpg|gif)$/
            },
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename: 'main.css'
        })
    ]
}