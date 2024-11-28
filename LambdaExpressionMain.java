package nov12;
@FunctionalInterface
interface MyInterface2{
	void add();
}

interface MyInterface3{
	void sub(int i, int j);
}
interface MyInterface4{
	int mult(int i, int j);
}


//class MyClass2 implements MyInterface2{
//	@Override
//	public void add() {
//		int i=3;
//		int j=9,s;
//		s=i+j;
//		System.out.println("sum="+s);
//		
//	}
//	
//}


public class LambdaExpressionMain {


	public static void main(String[] args) {
		MyInterface2 obj = new MyInterface2() {
			@Override
			public void add() {
				System.out.println("add method");
				
			}
		};
		obj.add();
		
		MyInterface2 obj1 = ()->{
			System.out.println("add method lambda exp");
		};
		obj1.add();
		
		MyInterface3 obj2 =(i,j)->{ //method with arg and no return type
			
			int r=i-j;
			System.out.println("difference="+r);
			
		};
		
		//or
		MyInterface3 obj4 =(i,j)->System.out.println("difference="+(i-j));
		
		obj4.sub(5,6);
		
		MyInterface4 obj5 =(i,j)->{
			int p;
			p=i*j;
			return p;
		};
		
		//or
		MyInterface4 obj6 =(i,j)->(i*j);
		System.out.println("Product of two numbers ="+obj6.mult(8,7));
	}


}
