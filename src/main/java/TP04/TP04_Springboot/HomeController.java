package TP04.TP04_Springboot;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

import jakarta.servlet.annotation.WebServlet;


@Controller
@RequestMapping("/TP04")
public class HomeController {
    @GetMapping("/task1")
    public String Task1() {
        return  "Task1";
    }
    @GetMapping("/task2")
    public String task2() {
        return "task2";
    }
    @GetMapping("/task3")
    public String Task3() {
        return "Task3";}
    @GetMapping("/task4")
    public String Task4() {
        return "Task4";}
    @GetMapping("/task5")
    public String Task5() {
        return "Task5";}
    
    
}
