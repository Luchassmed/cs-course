/*
William Grynderup Klindt: 71347.
Jacob Peter Diesel Nielsen: 71317.
Luchas Nickolaj Schmidt: 71413. 
*/

package MitProjekt;

import java.util.Random;

public class Player {
    public int posX;
    public int posY;

    public Player(int posX, int posY) { 
        this.posX = posX;
        this.posY = posY;
    }

    public static Player[] makePlayer() {

        Player[] player = new Player[1];

        for (int i = 0; i < player.length; i++) {

            Random pRandom = new Random();
            int x = pRandom.nextInt(10);
            int y = pRandom.nextInt(10);

            player[i] = new Player(x, y);
        }
        return player;
    }
}
