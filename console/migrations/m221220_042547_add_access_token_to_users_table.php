<?php

use yii\db\Migration;

/**
 * Class m221220_042547_add_access_token_to_users_table
 */
class m221220_042547_add_access_token_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'access_token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221220_042547_add_access_token_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
