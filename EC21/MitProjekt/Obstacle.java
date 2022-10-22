/*
William Grynderup Klindt: 71347.
Jacob Peter Diesel Nielsen: 71317.
Luchas Nickolaj Schmidt: 71413. 
*/

package MitProjekt;

import java.util.Random;

public class Obstacle {
    public int posX;
    public int posY;

    public Obstacle(int posX, int posY) {
        this.posX = posX;
        this.posY = posY;
    }

    public static Obstacle[] makeObstacles() {

        Obstacle[] obstacles = new Obstacle[3];

        for (int i = 0; i < obstacles.length; i++) {
            Random oRandom = new Random();
            int x = oRandom.nextInt(10);
            int y = oRandom.nextInt(10);
            obstacles[i] = new Obstacle(x, y);
        }
        return obstacles;
    }
}