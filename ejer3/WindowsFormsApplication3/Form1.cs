using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace WindowsFormsApplication3
{
    public partial class Form1 : Form
    {
        private int loggedInUserId;
        public Form1(int userId)
        {
            loggedInUserId = userId;
            InitializeComponent();
            this.Load += new System.EventHandler(this.Form1_Load);
        }
        private void Form1_Load(object sender, EventArgs e)
        {
           
        }
        public DataTable ObtenerDatosPersona(int userId)
        {
            string connectionString = "server=DESKTOP-A0Q6UBA\\SQLGRINSHOW;user=sa;pwd=123456;database=BDLeonel";
            using (SqlConnection con = new SqlConnection(connectionString))
            {
                string query = "SELECT ID_Persona, Nombre, Apellido, Rol FROM Persona WHERE ID_Persona = @UserId";
                SqlDataAdapter ada = new SqlDataAdapter(query, con);
                ada.SelectCommand.Parameters.AddWithValue("@UserId", userId);

                DataTable dt = new DataTable();
                ada.Fill(dt);
                return dt;
            }
        }

        public DataTable ObtenerDatosCuenta(int userId)
        {
            string connectionString = "server=DESKTOP-A0Q6UBA\\SQLGRINSHOW;user=sa;pwd=123456;database=BDLeonel";
            using (SqlConnection con = new SqlConnection(connectionString))
            {
                string query = "SELECT ID_Cuenta, NumeroCuenta, Saldo, Tipo_Cuenta, Departamento FROM CuentaBancaria WHERE ID_Persona = @UserId";
                SqlDataAdapter ada = new SqlDataAdapter(query, con);
                ada.SelectCommand.Parameters.AddWithValue("@UserId", userId);

                DataTable dt = new DataTable();
                ada.Fill(dt);
                return dt;
            }
        }

        public DataTable ObtenerDatosTransaccion(int userId)
        {
            string connectionString = "server=DESKTOP-A0Q6UBA\\SQLGRINSHOW;user=sa;pwd=123456;database=BDLeonel";
            using (SqlConnection con = new SqlConnection(connectionString))
            {
                string query = @"
                    SELECT t.ID_Transaccion, t.ID_Cuenta, t.Tipo, t.Monto, t.Fecha
                    FROM Transaccion t
                    INNER JOIN CuentaBancaria cb ON t.ID_Cuenta = cb.ID_Cuenta
                    WHERE cb.ID_Persona = @UserId";
                SqlDataAdapter ada = new SqlDataAdapter(query, con);
                ada.SelectCommand.Parameters.AddWithValue("@UserId", userId);

                DataTable dt = new DataTable();
                ada.Fill(dt);
                return dt;
            }
        }
      
        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void Form1_Load_1(object sender, EventArgs e)
        {
            DataTable dtPersona = ObtenerDatosPersona(loggedInUserId);
            DataTable dtCuenta = ObtenerDatosCuenta(loggedInUserId);
            DataTable dtTransaccion = ObtenerDatosTransaccion(loggedInUserId);

            // Asigna los DataTables a los DataGridView correspondientes
            dataGridViewPersona.DataSource = dtPersona;
            dataGridViewCuenta.DataSource = dtCuenta;
            dataGridViewTransaccion.DataSource = dtTransaccion;
        }

       
       
    }
}
