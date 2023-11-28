<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deep Earning API Reference</title>
</head>
<body>
    <fieldset>
        <legend>Deep Earning API Reference</legend>
   
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
                    <td>/api/sets/&lt;SET_ID&gt;/</td>
                    <td>Gets a set's data.</td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>/api/sets/</td>
                    <td>Creates a new set.</td>
                </tr>
                <tr>
                    <td>PATCH</td>
                    <td>/api/sets/&lt;SET_ID&gt;/</td>
                    <td>Updates a set.</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/api/sets/&lt;SET_ID&gt;/</td>
                    <td>Deletes a set.</td>
                </tr>
                
                <tr>
                    <td>GET</td>
                    <td>/api/images/&lt;IMAGE_ID&gt;/</td>
                    <td>Gets an image's data.</td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>/api/images/</td>
                    <td>Creates a new image.</td>
                </tr>
                <tr>
                    <td>PATCH</td>
                    <td>/api/images/&lt;IMAGE_ID&gt;/</td>
                    <td>Updates an image.</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/api/images/&lt;IMAGE_ID&gt;/</td>
                    <td>Deletes an image.</td>
                </tr>

                <tr>
                    <td>GET</td>
                    <td>/api/results/&lt;RESULT_ID&gt;/</td>
                    <td>Gets a result's data</td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>/api/results/</td>
                    <td>Creates a new result.</td>
                </tr>
                <tr>
                    <td>PATCH</td>
                    <td>/api/results/&lt;RESULT_ID&gt;/</td>
                    <td>Updates a result.</td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td>/api/results/&lt;RESULT_ID&gt;/</td>
                    <td>Deletes a result.</td>
                </tr>

            </tbody>
        </table>
    </fieldset>

    <style>
        td{
            padding: 2px;
       }
    </style>
</body>
</html>