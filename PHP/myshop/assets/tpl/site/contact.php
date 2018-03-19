<?php include './assets/tpl/layouts/header.php'; ?>

                <?php if ($result): ?>
                    <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div>
                        <h2>Обратная связь</h2>
                        <h5>Есть вопрос? Напишите нам</h5>
                        <br/>
                        <form action="#" method="post">
                            <p>Ваша почта</p>
                            <input type="email" name="userEmail" placeholder="E-mail" value="<?= $userEmail; ?>"/>
                            <p>Сообщение</p>
                            <input type="text" name="userText" placeholder="Сообщение" value="<?= $userText; ?>"/>
                            <br/>
                            <input type="submit" name="submit" value="Отправить" />
                        </form>
                    </div>
                <?php endif; ?>


<?php include './assets/tpl/layouts/footer.php'; ?>