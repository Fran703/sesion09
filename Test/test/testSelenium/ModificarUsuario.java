package testSelenium;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.htmlunit.HtmlUnitDriver;
import org.openqa.selenium.support.ui.Select;

public class ModificarUsuario {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
	  driver = new HtmlUnitDriver();
    baseUrl = "https://www.katalon.com/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testModificarUsuario() throws Exception {
    driver.get("http://proyectohmis.northeurope.cloudapp.azure.com/index.php");
    driver.findElement(By.name("usuario")).click();
    driver.findElement(By.name("usuario")).clear();
    driver.findElement(By.name("usuario")).sendKeys("admin");
    driver.findElement(By.name("clave")).click();
    driver.findElement(By.name("clave")).clear();
    driver.findElement(By.name("clave")).sendKeys("1234");
    driver.findElement(By.xpath("//button[@type='submit']")).click();
    driver.findElement(By.linkText("Listar Usuarios")).click();
    driver.findElement(By.xpath("//a/b")).click();
    driver.findElement(By.name("email")).click();
    driver.findElement(By.name("email")).clear();
    driver.findElement(By.name("email")).sendKeys("juan@hotmail.com");
    driver.findElement(By.name("clave")).click();
    driver.findElement(By.name("clave")).clear();
    driver.findElement(By.name("clave")).sendKeys("12345");
    driver.findElement(By.name("clave2")).click();
    driver.findElement(By.name("clave2")).clear();
    driver.findElement(By.name("clave2")).sendKeys("12345");
    driver.findElement(By.name("modificarUsuario")).click();
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
