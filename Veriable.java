package oct31;

public class Veriable {
		//member variables or instance variables
			int k; //0
			float f; //0.0
			char ch; //blank space
			String s; //null
			static String cname="BIT"; //class variables 
		public static void main(String args[]){
		//local variables
		int a=10;
		int b=30;
		//int c;


		System.out.println(a); //10
		//System.out.println(c); 
		System.out.println(b);//30


		Veriable variables = new Veriable(); //allocates memory
		System.out.println(variables.k);
		System.out.println(variables.f);
		System.out.println(variables.ch);
		System.out.println(variables.s);
		System.out.println(Veriable.cname);
		}

	}

