using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Data.SqlClient;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication3
{
    public partial class LoginForm : Form
    {
        public int LoggedInUserId { get; private set; }
        public LoginForm()
        {
            InitializeComponent();
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            string username = txtUsername.Text;
            string password = txtPassword.Text;

            if (AuthenticateUser(username, password))
            {
                this.DialogResult = DialogResult.OK;
                this.Close();
            }
            else
            {
                MessageBox.Show("Nombre de usuario o contraseña incorrectos.");
            }
        }
        private bool AuthenticateUser(string username, string password)
        {
            bool isAuthenticated = false;
            string connectionString = "server=DESKTOP-A0Q6UBA\\SQLGRINSHOW;user=sa;pwd=123456;database=BDLeonel";

            using (SqlConnection con = new SqlConnection(connectionString))
            {
                string query = "SELECT ID_Persona FROM Persona WHERE nombre = @username AND id_persona = @password";
                using (SqlCommand cmd = new SqlCommand(query, con))
                {
                    cmd.Parameters.AddWithValue("@username", username);
                    cmd.Parameters.AddWithValue("@password", password);

                    con.Open();
                    object result = cmd.ExecuteScalar();
                    if (result != null)
                    {
                        LoggedInUserId = Convert.ToInt32(result);
                        isAuthenticated = true;
                    }
                }
            }

            return isAuthenticated;
        }
    }
}
