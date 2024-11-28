package nov4;

abstract class Vehicle {
    abstract void move();
    
    void startEngine() {
        System.out.println("Engine starting...");
    }
}

class Car extends Vehicle {
    @Override
    void move() {
        System.out.println("Car is driving on the road");
    }
}

class Bike extends Vehicle {
    @Override
    void move() {
        System.out.println("Bike is cycling on the path");
    }
}

public class VehicleDemo {
    public static void main(String[] args) {
        Vehicle car = new Car();
        Vehicle bike = new Bike();
       
        System.out.println("Using Car object:");
        car.startEngine();
        car.move();
        
        System.out.println("\nUsing Bike object:");
        bike.startEngine();
        bike.move();
        
        System.out.println("\nUsing array of vehicles:");
        Vehicle[] vehicles = {new Car(), new Bike()};
        for (Vehicle vehicle : vehicles) {
            vehicle.move();
        }
    }
}