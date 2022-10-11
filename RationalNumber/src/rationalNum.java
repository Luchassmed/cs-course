public class rationalNum {
    public static void main(String[] args) throws Exception {
        Rational r1 = new Rational(5, 2);
        System.out.println(r1.numerator + "/" + r1.denominator);

        negate(r1);
        invert(r1);
    }

    public static void negate (Rational i){
        i.numerator = -i.numerator;
        System.out.println(i.numerator + "/" + i.denominator);
    }

    public static void invert (Rational i){
        System.out.println(i.denominator + "/" + i.numerator);
    }

}
    class Rational{
    int numerator;
    int denominator;

    public Rational (int numerator, int denominator){
        this.numerator = numerator;
        this.denominator = denominator;
    }

}
    



