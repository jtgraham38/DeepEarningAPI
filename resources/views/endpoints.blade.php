<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deep Earning API Reference</title>
</head>
<body>
    <table>
        <thead>
           <tr>
                <th>Method</th>
                <th>Endpoint</th>
                <th>Description</th>
           </tr>
        </thead>
        <tbody>
            <tr>
                <td>GET</td>
                <td>/sets/</td>
                <td>Returns a list of all image sets stored by the application.</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/sets/&lt;SET_ID&gt;/</td>
                <td>Returns a listing for every image in a given data set.</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/sets/&lt;IMAGE_ID&gt;/</td>
                <td>Gets details about a specific image from a data set.</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/results/&lt;IMAGE_ID&gt;/</td>
                <td>Gets results about a specific image.</td>
            </tr>

            <tr>
                <td>POST</td>
                <td>/create_set/</td>
                <td>Creates a new set to hold image records.</td>
            </tr>

            <tr>
                <td>POST</td>
                <td>/add_to_set/&lt;SET_ID&gt;/</td>
                <td>Adds a new image to an image set.</td>
            </tr>

            <tr>
                <td>POST</td>
                <td>/update_image/&lt;IMAGE_ID&gt;/</td>
                <td>Updates information about an image.</td>
            </tr>

            <tr>
                <td>POST</td>
                <td>/add_result/&lt;IMAGE_ID&gt;/</td>
                <td>Adds a result for an image submitted by a user.</td>
            </tr>

            <tr>
                <td>POST</td>
                <td>/update_result/&lt;IMAGE_ID&gt;/</td>
                <td>Updates a result for an image submitted by a user.</td>
            </tr>
        </tbody>
    </table>
</body>
</html>