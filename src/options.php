<div class="options__content">

    <form method="POST">
      
        <label for="idInstance"></label>
        <input type="text" id="idInstance" name="idInstance" value="<?php echo htmlspecialchars($_SESSION['idInstance']); ?>" placeholder="idInstance"><br><br>

        <label for="apiToken"></label>
        <input type="text" id="apiToken" name="apiToken" value="<?php echo htmlspecialchars($_SESSION['apiToken']); ?>" placeholder="apiToken"><br><br>

        <button type="submit" name="action" value="getSettings">getSettings</button>
        <button type="submit" name="action" value="getStateInstance">getStateInstance</button>

    </form>
    
    <form method="POST">
        <label for="phoneMessage"></label>
        <input type="text" id="phoneMessage" name="phoneMessage" placeholder="77771234567"><br><br>

        <label for="message"></label>
        <input type="text" id="message" name="message" placeholder="hello"><br><br>

        <button type="submit" name="action" value="sendMessage">sendMessage</button>
    
    </form>

    <form method="POST">

        <label for="phoneURL"></label>
        <input type="text" id="phoneURL" name="phoneURL" placeholder="7771234567"><br><br>

        <label for="url"></label>
        <input type="url" id="url" name="url" placeholder="http://ya.ru/1234"><br><br>

        <label for="filename"></label>
        <input type="text" id="filename" name="filename" placeholder="filename.txt"><br><br>

        <button type="submit" name="action" value="sendFileByUrl">sendFileByUrl</button>

    </form>

</div>