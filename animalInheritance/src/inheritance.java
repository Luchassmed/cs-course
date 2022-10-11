public class inheritance {
    public static void main(String[] args) throws Exception {
        //Animal myAnimal = new Animal("Brian");
        Dog myDog = new Dog("Dawg");
        Cat myCat = new Cat("Yeet");
        //myAnimal.sound();
        myDog.sound();
        myCat.sound();
    }
}

abstract class Animal { //Abstract classes kan ikke lave objects
    String name;

    public Animal(String name){
        this.name = name;
    }
    abstract void sound();
    /*{
        System.out.println("Hej");
    }*/
}

class Dog extends Animal {
    public Dog (String name){
        super(name);
    }
    public void sound(){
        System.out.println("Dawg");
    }
}

class Cat extends Dog{
    public Cat (String name){
        super(name);
    }
    public void sound(){
        System.out.println("Meow");
    }
}
